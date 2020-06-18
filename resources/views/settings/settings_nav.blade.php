<div class="px-0 setting-list-menu border-right text-sec">
    <div class="w-100 pb-4">
        <div class="w-100 px-4 py-3">
            <h4 class="mb-0">
                Settings Control
            </h4>
        </div>
    
        <div class="w-100 px-3">
            <div class="border-bottom"></div>
        </div>
    </div>

    <div class="w-100 settings-menu">
        <ul class="list-style-none w-100 setting-list-item overflow-y px-3">
            <li class="w-100 pb-3">
                <a href="{{ route('settings.account') }}" class="text-sec">
                    <div class="w-100 setting-item st-icon" id="account_settings">
                        <div class="d-flex h-100 align-items-center">
                            <span class="fad fa-user-hard-hat fa-lg st-icon ml-3"></span>
    
                            <span class="font-bold d-block text-left ml-3 flex-fill">Account Details</span>
                        </div>
                    </div>
                </a>
            </li>

            <li class="w-100 pb-3">
                <a href="{{ route('settings.tickets') }}" class="text-sec">
                    <div class="w-100 setting-item st-icon" id="ticket_settings">
                        <div class="d-flex h-100 align-items-center">
                            <span class="fad fa-ticket-alt fa-rotate-90 fa-lg st-icon ml-3"></span>
    
                            <span class="font-bold d-block text-left ml-3 flex-fill">Ticket Setup</span>
                        </div>
                    </div>
                </a>
            </li>

            <li class="w-100 pb-3">
                <a href="{{ route('settings.users') }}" class="text-sec">
                    <div class="w-100 setting-item st-icon" id="user_settings">
                        <div class="d-flex h-100 align-items-center">
                            <span class="fad fa-user-tag fa-lg st-icon ml-3"></span>
    
                            <span class="font-bold d-block text-left ml-3 flex-fill">User Maintenance</span>
                        </div>
                    </div>
                </a>
            </li>

            <li class="w-100 pb-3">
                <a href="" class="text-sec">
                    <div class="w-100 setting-item st-icon" id="notification_settings">
                        <div class="d-flex h-100 align-items-center">
                            <span class="fad fa-flag-alt fa-lg st-icon ml-3"></span>
    
                            <span class="font-bold d-block text-left ml-3 flex-fill">Notifications Setup</span>
                        </div>
                    </div>
                </a>
            </li>

            <li class="w-100 pb-3">
                <a href="" class="text-sec">
                    <div class="w-100 setting-item st-icon" id="mail_settings">
                        <div class="d-flex h-100 align-items-center">
                            <span class="fad fa-mailbox fa-lg st-icon ml-3"></span>
    
                            <span class="font-bold d-block text-left ml-3 flex-fill">Mail Configuration</span>
                        </div>
                    </div>
                </a>
            </li>

            <li class="w-100 pb-3">
                <a href="" class="text-sec">
                    <div class="w-100 setting-item st-icon" id="system_settings">
                        <div class="d-flex h-100 align-items-center">
                            <span class="fad fa-computer-classic fa-lg st-icon ml-3"></span>
    
                            <span class="font-bold d-block text-left ml-3 flex-fill">System Configuration</span>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>