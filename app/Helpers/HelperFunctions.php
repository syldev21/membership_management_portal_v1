<?php

namespace App\Helpers;

class HelperFunctions
{
    // app/Helpers/HelperFunctions.php

    // app/Helpers/HelperFunctions.php

    function getStageCount($stage) {
        $age_clusters = config('membership.age_clusters');

        if (isset($age_clusters['stage' . $stage])) {
            $age_cluster = $age_clusters['stage' . $stage];
            $start = $age_cluster['start'];
            $end = $age_cluster['end'] ?? null;

            // Initialize arrays to store counts for active, inactive, and deleted users
            $active_counts = [];
            $inactive_counts = [];
            $deleted_counts = [];

            // Fetch counts for active users in the given stage
            $active_query = \App\Models\User::where('cell_group_id', '!=', null)
                ->where('active', 1)
                ->where('registration_status', 5);

            if ($end !== null) {
                $active_query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$start, $end]);
            } else {
                $active_query->where(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), '>=', $start);
            }

            $active_counts['active'] = $active_query->count();

            // Fetch counts for inactive users in the given stage
            $inactive_query = \App\Models\User::where('cell_group_id', '!=', null)
                ->where('active', 0)
                ->where('existing', 1)
                ->where('registration_status', 5);

            if ($end !== null) {
                $inactive_query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$start, $end]);
            } else {
                $inactive_query->where(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), '>=', $start);
            }

            $inactive_counts['inactive'] = $inactive_query->count();

            // Fetch counts for deleted users in the given stage
            $deleted_query = \App\Models\User::where('cell_group_id', '!=', null)
                ->where('active', 0)
                ->where('existing', 0)
                ->where('registration_status', 5);

            if ($end !== null) {
                $deleted_query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$start, $end]);
            } else {
                $deleted_query->where(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), '>=', $start);
            }

            $deleted_counts['deleted'] = $deleted_query->count();

            // Combine the counts for all statuses and return the result as an associative array
            return array_merge($active_counts, $inactive_counts, $deleted_counts);
        }

        // Return an empty array if the provided stage is not defined in the age_clusters array
        return [];
    }

    function getCountForCriteria($cell_group_id, $age_cluster, $active, $existing, $registration_status) {
        $query = \App\Models\User::where('cell_group_id', $cell_group_id)
            ->where('active', $active)
            ->where('existing', $existing)
            ->where('registration_status', $registration_status);

        if (isset($age_cluster['start']) && isset($age_cluster['end']) && $age_cluster['start'] !== null && $age_cluster['end'] !== null) {
            $query->whereBetween(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), [$age_cluster['start'], $age_cluster['end']]);
        } elseif (isset($age_cluster['start']) && $age_cluster['start'] !== null) {
            $query->where(\Illuminate\Support\Facades\DB::raw('TIMESTAMPDIFF(YEAR, dob, CURDATE())'), '>=', $age_cluster['start']);
        }

        return $query->count();
    }


}
