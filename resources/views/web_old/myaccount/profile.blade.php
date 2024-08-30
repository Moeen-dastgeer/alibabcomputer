<x-web.myaccount-layout>
<h3 class="text-uppercase">Personal Details</h3>
<table class="table table-bordered">
    <thead>
    <tr class="bg-light">
        <th>First Name</th>
        <th>{{ Auth::guard('web')->user()->name}}</th>
    </tr>

    <tr class="bg-light">
        <th>Last Name</th>
        <th>{{ Auth::guard('web')->user()->last_name}}</th>
    </tr>

    <tr class="bg-light">
        <th>Email </th>
        <th>{{ Auth::guard('web')->user()->email}}</th>
    </tr>

    <tr class="bg-light">
        <th>Contact No</th>
        <th>{{ Auth::guard('web')->user()->phone}}</th>
    </tr>
    </thead>
</table>
</x-web.myaccount-layout>