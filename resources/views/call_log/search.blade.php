@extends('navbar')
@section('navbar')

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">

        <fieldset class="scheduler-border">
            <legend class="scheduler-border">
                <aa>Contact number</aa>
            </legend >
            <form class="form-horizontal" id="form2" name="loginform" method="post" action="call_log_search">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="col-sm-3 control-label"><a1>Contact Number</a1></label>
                    <div class="col-sm-6">
                        <input type="number"  id="contact_number" name="contact_number" >
                    </div>
                </div>
                <div>
                    <div class="col-sm-offset-4 col-sm-1">
                        <input type="submit"  name="Submit" >
                    </div>
                    <div class="col-sm-offset-0 col-sm-2">
                        <a1><button type="button"  onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=call_log&action=view&alert=';">Cancel</button></a1>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
    <div class="col-sm-2"></div>
</div>

    @stop
