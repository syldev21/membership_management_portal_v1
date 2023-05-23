<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();



        //Define permissions
        $Add_Members = Permission::findOrCreate(config('membership.permissions.Add_Members.text')); //line 33
        $Assign_Role = Permission::findOrCreate(config('membership.permissions.Assign_Role.text'));
        $Decline_Membership = Permission::findOrCreate(config('membership.permissions.Decline_Membership.text'));
        $Delete_Members = Permission::findOrCreate(config('membership.permissions.Delete_Members.text'));
        $Edit_Members = Permission::findOrCreate(config('membership.permissions.Edit_Members.text'));
        $Initial_Approval = Permission::findOrCreate(config('membership.permissions.Initial_Approval.text'));
        $Provisional_Approval = Permission::findOrCreate(config('membership.permissions.Provisional_Approval.text'));
        $Final_Approval = Permission::findOrCreate(config('membership.permissions.Final_Approval.text'));
        $See_Members = Permission::findOrCreate(config('membership.permissions.See_Members.text'));
        $View_Only = Permission::findOrCreate(config('membership.permissions.View_Only.text'));


        //Define roles and assign permissions
        $adminRole = Role::findOrCreate(config('membership.roles.admin.text'));
        $adminRole->syncPermissions([
            $Add_Members,
            $Assign_Role,
            $Decline_Membership,
            $Delete_Members,
            $Edit_Members,
            $Initial_Approval,
            $Provisional_Approval,
            $Final_Approval,
            $See_Members
        ]);

        $viewRole = Role::findOrCreate(config('membership.roles.view.text'));
        $viewRole->syncPermissions(
            [
            $See_Members,
            $View_Only
            ]
        );
        $pastorRole = Role::findOrCreate(config('membership.roles.pastor_in_charge.text'));
        $pastorRole->syncPermissions(
            [
            $Add_Members,
            $Decline_Membership,
            $Delete_Members,
            $Edit_Members,
            $Initial_Approval,
            $Provisional_Approval,
            $Final_Approval,
            $See_Members
            ]
        );
        $secretaryRole=Role::findOrCreate(config('membership.roles.secretary.text'));
        $secretaryRole->syncPermissions(
            [
                $Add_Members,
                $Decline_Membership,
                $Delete_Members,
                $Edit_Members,
                $Initial_Approval,
                $Provisional_Approval,
                $See_Members
            ]
        );
        $cellPastorRole = Role::findOrCreate(config('membership.roles.cell_group_pastor.text'));
        $cellPastorRole->syncPermissions(
            [
                $Add_Members,
                $Decline_Membership,
                $Delete_Members,
                $Edit_Members,
                $Initial_Approval,
                $See_Members
            ]
        );
    }
}
