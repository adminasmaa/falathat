<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponsesInterface;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected $responder;

    /**
     * SettingsController constructor.
     * @param ResponsesInterface $responder
     */
    public function __construct(ResponsesInterface $responder)
    {
        $this->middleware('auth');
        $this->responder = $responder;
    }

    /**
     * @param $page
     * @param $section
     *
     * @return View
     */
    public function index(Request $request)
    {
        $page_settings = Setting::orderBy('id', 'ASC')->where('section', $request->section)->get();

        return !$page_settings->count()
            ? abort(404)
            : view("dashboard.settings", compact('page_settings'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        Setting::all()->each(function ($setting) use ($request) {
            if (array_key_exists($setting->key, $request->translated_attributes ?? [])) {
                if (is_object($request->translated_attributes[$setting->key][1]['value'])) {
                    Storage::disk('public')->delete($setting->value);
                    $value = Storage::disk('public')->putFile(
                        rtrim('settings/images/', '/'),
                        $request->translated_attributes[$setting->key][1]['value']
                    );
                    $setting->translations()->sync([1 => ['value' => $value], 2 => ['value' => $value]]);
                } else
                    $setting->translations()->sync($request->translated_attributes[$setting->key]);
            } elseif ($setting->type === 'repeater') {
                $values = [];
                foreach ($request['social_media_links'] ?? [] as $social_media) {
                    if (isset($social_media['name'])) {
                        if (isset($social_media['image']) && is_object($social_media['image'])) {
                            $icon = Storage::disk('public')->putFile(
                                rtrim("settings/images/", '/'),
                                $social_media['image']
                            );
                        } elseif (isset($social_media['image']) && is_string($social_media['image'])) {
                            $icon = $social_media['image'];
                        }
                        $values[] = ['name' => $social_media['name'], 'icon' => $icon ?? null, 'link' => $social_media['link'] ?? null, 'enabled' => $social_media['enabled'] ?? null];
                    }
                }
                $setting->translations()->sync([1 => ['value' => json_encode($values)]]);
            }
        });

        return $this->responder->respond([
            'data' => [
                'message' => 'Settings has been updated successfully.'
            ]
        ]);
    }
}
