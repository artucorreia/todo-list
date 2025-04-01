@extends('layouts.main')

@section('title', 'Edit Profile')

@section('content')

    <link rel="stylesheet" href="/css/background/bg.css">

    <x-arrow-back-page title="Go back to home page" />

    <div class="background_image min-h-180 py-15">
        <div class="w-120 mx-auto max-md:w-full">
            <x-bladewind::tab-group name="tab-icon">
                <x-slot name="headings">
                    <x-bladewind::tab-heading name="icon-blue" active="false" icon="user" label="Edit Profile"
                        active="true" />
                    <x-bladewind::tab-heading name="icon-inactive" icon="lock-closed" label="Edit Password" />
                </x-slot>
                <x-bladewind::tab-body>
                    <x-bladewind::tab-content name="icon-blue" active="true">
                        <x-edit-profile-form />
                    </x-bladewind::tab-content>
                    <x-bladewind::tab-content name="icon-inactive" active="false">
                        <x-edit-password-form />
                    </x-bladewind::tab-content>
                </x-bladewind::tab-body>
            </x-bladewind::tab-group>

        </div>
    </div>

@endsection

