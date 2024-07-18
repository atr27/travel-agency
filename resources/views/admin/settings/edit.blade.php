@extends('layouts.app')

@section('content')
<div class="container-fluid">

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Configure Settings')}}</h1>
                    <a href="{{ route('admin.settings.index') }}" class="btn btn-success btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="facebook">{{ __('Facebook') }}</label>
                        <input type="text" class="form-control" id="facebook" placeholder="{{ __('facebook') }}" name="facebook" value="{{ old('facebook', $setting->facebook) }}" />
                    </div>
                    <div class="form-group">
                        <label for="instagram">{{ __('Instagram') }}</label>
                        <input type="text" class="form-control" id="instagram" placeholder="{{ __('instagram') }}" name="instagram" value="{{ old('instagram', $setting->instagram) }}" />
                    </div>
                    <div class="form-group">
                        <label for="linkedin">{{ __('Linked In') }}</label>
                        <input type="text" class="form-control" id="linkedin" placeholder="{{ __('linkedin') }}" name="linkedin" value="{{ old('linkedin', $setting->linkedin) }}" />
                    </div>
                    <div class="form-group">
                        <label for="number">{{ __('Phone Number') }}</label>
                        <input type="number" class="form-control" id="number" placeholder="{{ __('number') }}" name="number" value="{{ old('number', $setting->number) }}" />
                    </div>
                    <div class="form-group">
                        <div> <label for="logo">{{ __('Logo') }}</label></div>
                        <img src="{{ Storage::url($setting->logo) }}" alt="logo">
                        <input type="file" class="form-control" id="logo" placeholder="{{ __('logo') }}" name="logo" value="{{ old('logo') }}" />
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('Save')}}</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
@endsection


@push('style-alt')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script-alt')
<script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"
    >
    </script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
      $('.select-multiple').select2();
</script>
@endpush
