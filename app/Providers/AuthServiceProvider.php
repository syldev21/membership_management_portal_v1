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
        $Add_Members = Permission::findOrCreate(config('membership.permissions.Add_Members.text'));
        $Assign_Role = Permission::findOrCreate(config('membership.permissions.Assign_Role.text'));
        $Decline_Membership = Permission::findOrCreate(config('membership.permissions.Decline_Membership.text'));
        $Delete_Members = Permission::findOrCreate(config('membership.permissions.Delete_Members.text'));
        $Edit_Members = Permission::findOrCreate(config('membership.permissions.Edit_Members.text'));
        $prepare_registration = Permission::findOrCreate(config('membership.permissions.prepare_registration.text'));
        $review_registration = Permission::findOrCreate(config('membership.permissions.review_registration.text'));
        $approve_registration = Permission::findOrCreate(config('membership.permissions.approve_registration.text'));
        $See_Members = Permission::findOrCreate(config('membership.permissions.See_Members.text'));
        $generate_report = Permission::findOrCreate(config('membership.permissions.generate_report.text'));


        //Define roles and assign permissions
        $adminRole = Role::findOrCreate(config('membership.roles.admin.text'));
        $adminRole->syncPermissions([
            $Add_Members,
            $Assign_Role,
            $Decline_Membership,
            $Delete_Members,
            $Edit_Members,
            $prepare_registration,
            $review_registration,
            $approve_registration,
            $See_Members,
            $generate_report
        ]);

        $viewRole = Role::findOrCreate(config('membership.roles.view.text'));
        $viewRole->syncPermissions(
            [
            $See_Members,
            $generate_report
            ]
        );
        $approverRole = Role::findOrCreate(config('membership.roles.approver.text'));
        $approverRole->syncPermissions(
            [
            $Add_Members,
            $Decline_Membership,
            $Delete_Members,
            $Edit_Members,
            $prepare_registration,
            $review_registration,
            $approve_registration,
            $See_Members,
                $generate_report
            ]
        );
        $reviewerRole=Role::findOrCreate(config('membership.roles.reviewer.text'));
        $reviewerRole->syncPermissions(
            [
                $Add_Members,
                $Decline_Membership,
                $Delete_Members,
                $Edit_Members,
                $prepare_registration,
                $review_registration,
                $See_Members,
                $generate_report
            ]
        );
        $preparerRole = Role::findOrCreate(config('membership.roles.preparer.text'));
        $preparerRole->syncPermissions(
            [
                $Add_Members,
                $Decline_Membership,
                $Delete_Members,
                $Edit_Members,
                $prepare_registration,
                $See_Members,
                $generate_report
            ]
        );
    }
}
