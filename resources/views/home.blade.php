@extends('layouts.app')

@section('content')
    <div class="container">
{{--        <?php if(auth()->user()['is_admin']) {--}}
{{--            ?><router-link to="/dashboard">home</router-link>--}}

{{--        <?php }?>--}}
        <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><?php if(auth()->user()['is_admin']){?>
                    {{ __('Dashboard') }}
                    <?php } ?>
                </div>

                <div class="card-body" id="app">
                    <chat-app :user="{{ auth()->user() }}"></chat-app>
                </div>
            </div>
        </div>
    </div>
</div>
    <router-view></router-view>
@endsection
