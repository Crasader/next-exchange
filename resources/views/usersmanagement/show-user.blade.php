@extends('_layouts.admin') 
@section('template_title') Showing User {{ $user->name }}
@endsection
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel @if ($user->activated == 1) panel-success @else panel-danger @endif">

                <div class="panel-heading py-4">
                    <a href="/users/" class="btn btn-success btn-sm pull-right">
              <i class="fa fa-fw fa-mail-reply text-white" aria-hidden="true"></i>
              <span class="hidden-xs">Back</span>
            </a> Users Panel
                </div>
                <div class="panel-body">

                    <div class="well">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="@if ($user->profile && $user->profile->avatar_status == 1) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif"
                                    alt="{{ $user->name }}" id="" class="img-circle center-block margin-bottom-2 margin-top-1 user-image">
                            </div>

                            <div class="col-sm-6">
                                <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                                    {{ $user->name }}
                                </h4>
                                <p class="text-center text-left-tablet">
                                    <strong>
                      {{ $user->first_name }} {{ $user->last_name }}
                    </strong>
                                    <br /> {{ Html::mailto($user->email, $user->email) }}
                                </p>

                                {{-- @if ($user->profile) --}}
                                <div class="text-center text-left-tablet margin-bottom-1">

                                    {{-- <a href="{{ url('/profile/'.$user->name) }}" class="btn btn-sm btn-info">
                        <span class="hidden-xs hidden-sm hidden-md">View Profile</span>
                      </a> --}}

                                    <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-warning">
                        <span class="hidden-xs hidden-sm hidden-md">Edit User</span>
                      </a> {!! Form::open(array('url' => 'users/' . $user->id, 'class'
                                    => 'form-inline')) !!} {!! Form::hidden('_method', 'DELETE') !!} {!! Form::button('
                                    <span
                                        class="hidden-xs hidden-sm hidden-md">' .'Delete User'. '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button',
                                        'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete
                                        User', 'data-message' => 'Are you sure you want to delete this user?')) !!} {!! Form::close()
                                        !!}

                                </div>
                                {{-- @endif --}}

                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    @if ($user->name)

                    <div class="col-sm-5 col-xs-6 text-larger">
                        <strong>
                  Username
                </strong>
                    </div>

                    <div class="col-sm-7">
                        {{ $user->name }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    @endif @if ($user->email)

                    <div class="col-sm-5 col-xs-6 text-larger">
                        <strong>
                Email
              </strong>
                    </div>

                    <div class="col-sm-7">
                        {{ Html::mailto($user->email, $user->email) }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    @endif


                    <div class="col-sm-5 col-xs-6 text-larger">
                        <strong>
                User Role
              </strong>
                    </div>

                    <div class="col-sm-7">
                        @foreach ($user->roles as $user_role) @if ($user_role->name == 'User') @php $labelClass = 'primary' 
@endphp @elseif ($user_role->name
                        == 'Admin') @php $labelClass = 'warning' 
@endphp @elseif ($user_role->name == 'Unverified') @php
                        $labelClass = 'danger' 
@endphp @else @php $labelClass = 'default' 
@endphp @endif

                        <span class="label label-{{$labelClass}}">{{ $user_role->name }}</span> @endforeach
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    <div class="col-sm-5 col-xs-6 text-larger">
                        <strong>
                Status
              </strong>
                    </div>

                    <div class="col-sm-7">
                        @if ($user->activated == 1)
                        <span class="label label-success">
                  Activated
                </span> @else
                        <span class="label label-danger">
                  Not-Activated
                </span> @endif
                    </div>


                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    @if ($user->phone_country_code)

                    <div class="col-sm-5 col-xs-6 text-larger">
                        <strong>
                  Country Code
                </strong>
                    </div>

                    <div class="col-sm-7">
                        {{ $user->phone_country_code }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    @endif @if ($user->phone_number)

                    <div class="col-sm-5 col-xs-6 text-larger">
                        <strong>
                  Phone Number
                </strong>
                    </div>

                    <div class="col-sm-7">
                        {{ $user->phone_number }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    @endif @if ($user->created_at)

                    <div class="col-sm-5 col-xs-6 text-larger">
                        <strong>
                  Created At
                </strong>
                    </div>

                    <div class="col-sm-7">
                        {{ $user->created_at }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    @endif @if ($user->updated_at)

                    <div class="col-sm-5 col-xs-6 text-larger">
                        <strong>
                  Updated At
                </strong>
                    </div>

                    <div class="col-sm-7">
                        {{ $user->updated_at }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    @endif @if ($user->signup_ip_address)

                    <div class="col-sm-5 col-xs-6 text-larger">
                        <strong>
                  Ip Address
                </strong>
                    </div>

                    <div class="col-sm-7">
                        {{ $user->signup_ip_address }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    @endif @if ($user->signup_confirmation_ip_address)

                    <div class="col-sm-5 col-xs-6 text-larger">
                        <strong>
                  Ip Confirm Address
                </strong>
                    </div>

                    <div class="col-sm-7">
                        {{ $user->signup_confirmation_ip_address }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    @endif @if ($user->signup_sm_ip_address)

                    <div class="col-sm-5 col-xs-6 text-larger">
                        <strong>
                  {{ trans('usersmanagement.labelIpSocial') }}
                </strong>
                    </div>

                    <div class="col-sm-7">
                        {{ $user->signup_sm_ip_address }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    @endif @if ($user->admin_ip_address)

                    <div class="col-sm-5 col-xs-6 text-larger">
                        <strong>
                  {{ trans('usersmanagement.labelIpAdmin') }}
                </strong>
                    </div>

                    <div class="col-sm-7">
                        {{ $user->admin_ip_address }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    @endif @if ($user->updated_ip_address)

                    <div class="col-sm-5 col-xs-6 text-larger">
                        <strong>
                  {{ trans('usersmanagement.labelIpUpdate') }}
                </strong>
                    </div>

                    <div class="col-sm-7">
                        {{ $user->updated_ip_address }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                    @endif

                </div>

            </div>
        </div>
    </div>
</div>
    @include('modals.modal-delete')
@endsection
 
@section('footer_scripts')
    @include('scripts.delete-modal-script')
@endsection