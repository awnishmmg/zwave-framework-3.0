<?php

load::model('user/User_permission');
if(!class_exists('Permission')){
	class_alias('User_permission_model','Permission');
}
$permission = new Permission();

$login_id = session::get('session_data')['login_id'];
$menu = $permission->getMenusByLoginId($login_id);

// prx($menu);

?>

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

<div class="slimscroll-menu">

<!--- Sidemenu -->
<div id="sidebar-menu">

<ul class="metismenu" id="side-menu">

<li class="menu-title">Quick Navigation</li>

<?php if($menu['menu_dashboard']==1): ?>
	<li>
	<a href="<?php echo base_url("admin/dashboard/main#"); ?>">
	<i class="mdi mdi-view-dashboard"></i>
	<span> Dashboard </span>
	</a>
	</li>
<?php endif; ?>

<?php if($menu['menu_user_account']==1): ?>
	<li>
		<a href="javascript: void(0);">
		<i class="mdi mdi-format-underline"></i>
		<span>User Accounts</span>
		<span class="menu-arrow"></span>
		</a>
		<ul class="nav-second-level" aria-expanded="false">

			<li>
				<a href="<?php echo base_url('admin/manage-user/add-new'); ?>">Add User</a>
			</li>
			<li>
			<a href="<?php echo base_url('admin/manage-user/add-new-bdagent'); ?>">
			Add BDs</a>
			</li>
			<li>
				<a href="<?php echo base_url('admin/manage-user/user'); ?>">Manage Users</a>
			</li>
			<li>	
			<a href="<?php echo base_url('admin/manage-user/bds'); ?>">Manage BDs
			</a>
			</li>

		</ul>
</li>

<?php endif; ?>

<?php if($menu['menu_other']==1): ?>
<!-- Others Section -->
<li>
<a href="javascript: void(0);">
<i class="mdi mdi-format-underline"></i>
<span>Others</span>
<span class="menu-arrow"></span>
</a>

<ul class="nav-second-level" aria-expanded="false">
<li>
	<a href="<?php echo base_url('admin/department/manage/view'); ?>">
		Manage Department
	</a>
</li>
<!-- Contacts -->
<li>
<a href="javascript: void(0);">
<!-- <i class="mdi mdi-format-underline"></i> -->
<span>Contacts</span>
<span class="menu-arrow"></span>
</a>

<ul class="nav-second-level" aria-expanded="false">

<li>
	<a href="<?php echo base_url('admin/contacts/add'); ?>">
		Add Contacts
	</a>
</li>

<li>
	<a href="<?php echo base_url('admin/contacts/manage'); ?>">
		Manage Contacts
	</a>
</li>

</ul>
</li>
<!-- Contacts -->
<!-- Extra -->
<li>
	<a href="javascript:void();">
		Others
	</a>
</li>
<!-- Extra -->

</ul>
</li>
<!-- Others Section -->
<?php endif;?>

<!-- End of Ul and Side Menus -->
</ul>

</div>
<!-- End Sidebar -->

<div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->