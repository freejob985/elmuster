@php

@endphp
<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('admin.dashboard') }}" class="d-block">
                <img src="{{ custom_asset(\App\Utility\SettingsUtility::get_settings_value('system_logo_white')) }}"
                    class="img-fluid">
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <ul class="aiz-side-nav-list" data-toggle="aiz-side-menu">

                <li class="aiz-side-nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Dashboard')}}</span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-tasks aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Projects')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('all_projects') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('All Projects')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('running_projects') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Running Project')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('open_projects') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Open Project')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('cancelled_projects') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Cancelled Project')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('cancel-project-request.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Project Cancel Request')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('project-categories.index') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['project-categories.index', 'project-categories.edit', 'project-categories.destroy'])}}">
                                <span class="aiz-side-nav-text">{{translate('Project Category')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-tasks aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Services')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('all_services_admin') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('All Services')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="{{ route('verification_requests') }}"
                        class="aiz-side-nav-link {{ areActiveRoutes(['verification_requests', 'verification_request_details'])}}">
                        <i class="las la-user-check aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Verification Requests')}} &nbsp; <span
                                class="badge" style="background: #da612d;">
                                {{ DB::table('verifications')->where('verified',"0")->count() }}
                            </span><a href="#"> </a></span>
                    </a>

                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('admin.notifications.all') }}"
                        class="aiz-side-nav-link {{ areActiveRoutes(['verification_requests', 'verification_request_details'])}}">
                        <i class="las la-user-circle aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">???????? ??????????????????<a href="#"> </a></span>
                    </a>

                </li>

                <li class="aiz-side-nav-item">
                    <a href="{{ route('chat.admin.all') }}"
                        class="aiz-side-nav-link {{ areActiveRoutes(['chat.admin.all', 'chat_details_for_admin'])}}">
                        <i class="las la-sms aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Users Chats')}}</span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user-circle aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Freelancers')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('all_freelancers') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['all_freelancers', 'freelancer_info_show'])}}">
                                <span class="aiz-side-nav-text">{{translate('All Freelancers')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('freelancer_package.index', 'freelancer') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['freelancer_package.index', 'freelancer_package.create', 'freelancer_package.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Freelancer Packages')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('skills.index') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['skills.index', 'skills.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Freelancer Skills')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('badges.index') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['badges.index', 'badges.create', 'badges.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Freelancer Badges')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user-tie aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Clients')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('all_clients') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['client_info_show'])}}">
                                <span class="aiz-side-nav-text">{{translate('All Clients')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('client_package.index', 'client') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['client_package.index', 'client_package.create', 'client_package.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Client Packages')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('client_badges_index') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['client_badges_index', 'client_badges_edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Client Badges')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>


                {{--  #################  --}}
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user-tie aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">???????????????? ????????????</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('all_comprehensive') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['client_info_show'])}}">
                                <span class="aiz-side-nav-text">???????? ??????????????</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('client_package.index', 'comprehensive') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['client_package.index', 'client_package.create', 'client_package.edit'])}}">
                                <span class="aiz-side-nav-text">??????????????</span>
                            </a>
                        </li>

                    </ul>
                </li>


                {{--  #################  --}}
                {{--  #################  --}}
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user-tie aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"> ??????????????????</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('Advertisement.admin') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['client_info_show'])}}">
                                <span class="aiz-side-nav-text">???????? ??????????????????</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('Advertisement.add') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['client_package.index', 'client_package.create', 'client_package.edit'])}}">
                                <span class="aiz-side-nav-text">?????????? ?????????? </span>
                            </a>
                        </li>

                    </ul>
                </li>
                {{--  #################  --}}

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-star-half-alt aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Reviews')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('reviews.freelancer') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['reviews.freelancer', 'freelancer_review_details'])}}">
                                <span class="aiz-side-nav-text">{{translate('Freelancers Reviews')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('reviews.client') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['reviews.client', 'client_review_details'])}}">
                                <span class="aiz-side-nav-text">{{translate('Client Reviews')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (\App\Addon::where('unique_identifier', 'support_tickets')->first() != null &&
                \App\Addon::where('unique_identifier', 'support_tickets')->first()->activated == 1)
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-people-carry aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Support Ticket')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('support-tickets.active_ticket') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['support-tickets.edit'])}}">
                                <span class="aiz-side-nav-text">{{__('Active Tickets')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('support-tickets.my_ticket') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['support-tickets.show'])}}">
                                <span class="aiz-side-nav-text">{{__('My tickets')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('support-tickets.solved_ticket') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['support-tickets.show'])}}">
                                <span class="aiz-side-nav-text">{{__('Solved tickets')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Support Settings')}}</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>

                            <ul class="aiz-side-nav-list level-3">
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('support-categories.index') }}"
                                        class="aiz-side-nav-link {{ areActiveRoutes(['support-categories.index', 'support-categories.edit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Category')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('default_ticket_assigned_agent') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{translate('Default Asssigned Agent')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-chart-bar aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Accountings')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{route('payment_history_for_admin')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Project Payments')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('package_payment_history_for_admin')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Package Payments')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('service_payment_history_for_admin')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Service Payments')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('withdraw_request.index') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['pay_to_freelancer'])}}">
                                <span class="aiz-side-nav-text">{{translate('Freelancer Withdraw Requests')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('freelancer_payment.index')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Freelancer Payouts')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-hourglass-half aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Website')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.header') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Header')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.footer') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Footer')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.pages') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['website.home'])}}">
                                <span class="aiz-side-nav-text">{{translate('pages')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.appearance') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Appearance')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item" >
                    <a href="#"
                        class="aiz-side-nav-link {{ areActiveRoutes(['employees.create', 'employees.edit', 'employees.set_permission'])}}">
                        <i class="las la-user aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Employee')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        @foreach (\App\Models\Role::all() as $key => $role)
                        @if ($role->id != "1" && $role->id != "2" && $role->id != "3")
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('employees.index', $role->name) }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['employees.set_permission','employees.edit'])}}">
                                <span class="aiz-side-nav-text">{{ $role->name }}</span>
                            </a>
                        </li>
                        @endif
                        @endforeach
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('roles.index') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['roles.create', 'roles.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Employee Roles')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-cog aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Setting')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('general-config.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('General')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('general_configuration') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Activation')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('languages.index') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['languages.edit', 'languages.show'])}}">
                                <span class="aiz-side-nav-text">{{translate('System Languages')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('currencies.index') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['currencies.create','currencies.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('System Currency')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('email-config.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Email')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('payment-config.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Payment Gateways')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('social-media-config.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('3rd Party API')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('freelancer_payment_settings') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Freelancer Payment')}}</span>
                            </a>
                        </li>
                        <!-- <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Manage Location')}}</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>

                            <ul class="aiz-side-nav-list level-3">
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('countries.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['countries.create', 'countries.edit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Country')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('cities.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['cities.index', 'cities.edit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('State')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </li>

                <!-- Offline Payment Addon-->
                @if (\App\Addon::where('unique_identifier', 'offline_payment')->first() != null &&
                \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated)
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-money-check-alt aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Offline Payment System')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('manual_payment_methods.index') }}"
                                class="aiz-side-nav-link {{ areActiveRoutes(['manual_payment_methods.index', 'manual_payment_methods.create', 'manual_payment_methods.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Manual Payment Methods')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('offline_project_payments_history') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Offline Project Payments')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('offline_package_payments_history') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Offline Package Payments')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('offline_service_payments_history') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Offline Service Payments')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="aiz-side-nav-item" style="
    display: none;
">
                    <a href="{{ route('addons.index') }}"
                        class="aiz-side-nav-link {{ areActiveRoutes(['addons.create'])}}">
                        <i class="las la-cubes aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Addon Manager')}}</span>
                    </a>
                </li>
            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->