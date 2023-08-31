{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> Tableau de bord</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('entreprise') }}"><i class="nav-icon la la-users"></i> Entreprises </a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('machine') }}"><i class="nav-icon la la-tools"></i> Machines</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('inspecteur') }}"><i class="nav-icon la la-users"></i> Inspecteurs</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('inspection') }}"><i class="nav-icon la la-tools"></i> Inspections</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('certification') }}"><i class="nav-icon la la-book"></i> Certifications</a></li>




@hasrole('admin')

<!--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i> Utilisateurs</a></li>-->

<!-- Users, Roles, Permissions -->
<!--<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
	<ul class="nav-dropdown-items">
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
	</ul>
</li>-->

@endhasrole