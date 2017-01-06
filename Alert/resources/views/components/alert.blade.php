@if(session()->has('alert'))
    <alert  highlight="{{ session('alert')['highlight'] }}"
            type="{{ session('alert')['type'] }}"
            message="{{ session('alert')['message'] }}"
            icon="{{ session('alert')['icon'] }}"
    ></alert>
@endif