@extends('layout.master')
@section('title')
    Admin | Add Attribute
@endsection
@section('contents')
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Add Attribute</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-tiny">Attributes</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Add Attribute</div>
                    </li>
                </ul>
            </div>
            <!-- new-attribute -->
            <div class="wg-box">
                <form class="form-new-product form-style-1">
                    <fieldset class="name">
                        <div class="body-title">Attribute name</div>
                        <input class="flex-grow" type="text" placeholder="Attribute name" name="text" tabindex="0"
                            value="" aria-required="true" required="">
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title">Attribute value</div>
                        <input class="flex-grow" type="text" placeholder="Attribute value" name="text" tabindex="0"
                            value="" aria-required="true" required="">
                    </fieldset>
                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
            <!-- /new-category -->
        </div>
        <!-- /main-content-wrap -->
    </div>
@endsection
