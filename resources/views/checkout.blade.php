<!-- resources/views/checkout.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('pay') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="name" class="col-3 control-label">Name</label>

                <div class="col-6">
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <label for="address" class="col-3 control-label">Address</label>

                <div class="col-6">
                    <input type="text" name="address" id="address" class="form-control">
                </div>
				
				<label for="shipping" class="col-3 control-label">Shipping</label>
				<div class="col-6">
					
					<div class="radio">
					  <label><input type="radio" name="shipping" checked>Free standard</label>
					</div>
					<div class="radio">
					  <label><input type="radio" name="shipping">express 10 EUR</label>
					</div>
				</div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-offset-3 col-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-check"></i> Checkout
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Tasks -->
@endsection