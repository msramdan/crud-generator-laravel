@extends('layouts.app')

@section('title', __('Create Module'))

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Generators') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Generators') }}</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('generators.store') }}" method="POST" id="form-generator">
                                @csrf
                                @method('POST')

                                @include('generator::include.form')

                                <a href="{{ url()->previous() }}" id="btn-back"
                                    class="btn btn-secondary">{{ __('Back') }}</a>

                                <button type="submit" id="btn-save" class="btn btn-primary">{{ __('Generate') }}</button>
                            </form>
                        </div>
                    </div>
                    <div id="validation-errors" style="display: none;">
                        <div class="alert alert-danger fade show" role="alert">
                            <h4 class="alert-heading">Error</h4>
                            <ul class="mb-0"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('generator::include.script')
