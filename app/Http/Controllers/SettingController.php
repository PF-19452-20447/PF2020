<?php

namespace App\Http\Controllers;

use App\DataTables\SettingDataTable;
use App\Http\Controllers\Traits\Authorizable;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Class SettingController
 * @package App\Http\Controllers
 */
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SettingDataTable $dataTable)
    {
        //$model = new Setting();
        //dd(Setting::getTableSchema());
        //$model->loadDefaultValues();
        //ddd($model->loadDefaultValues());
        //ddd($model->getTableSchema());
        //echo json_encode($model->getTableSchema());
        return $dataTable->render('settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = new Setting();
        $setting->loadDefaultValues();
        return view('settings.create', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedAttributes = $this->validateForm($request);

        if(($model = Setting::create($validatedAttributes)) ) {
            //flash('Role Added');
            return redirect(route('settings.show', $model));
        }else
            return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        return view('settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $validatedAttributes = $this->validateForm($request, $setting);
        $setting->fill($validatedAttributes);
        if($setting->save()) {
            //flash('Role Added');
            return redirect(route('settings.show', $setting));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect(route('settings.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, Setting $model = null): array
    {

        $validate_array = [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'alpha_dash', 'max:255', $model === null ? 'unique:settings' : Rule::unique('settings')->ignore($model)], // 'email' => 'required|email|unique:users,email,' . $id,
            //'slug' => 'required|string|max:255|unique:settings,slug,' . $id,
            'type' => 'required|integer',
            'group' => 'nullable|string|max:255',
            'options' => 'nullable|string',
            'value' => 'nullable|string',
            'order' => 'required|integer|min:0',
        ];
        return $request->validate($validate_array);
    }
}
