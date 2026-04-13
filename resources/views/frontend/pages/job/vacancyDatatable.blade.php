<!-- Table View -->
<div id="tableView" class="pt_30">
    <div class="text-box mb-3">
        <h2>Job <span>Listings</span></h2>
    </div>
    <div class="mb-5">
        <div class="table-responsive card shadow-sm p-2">
            <table id="jobsTable" class="table table-bordered text-center align-middle"
                style="border-color: var(--secondary-color); width: 100%;">
                <thead class="table-light">
                    <tr>
                        <th>Country</th>
                        <th>Company</th>
                        <th>Category</th>
                        <th>Job Title</th>
                        <th>People Requested</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                    <tr>

                        <!-- Country (from vacancy) -->
                        <td>
                            {{ $job->vacancy?->custom_company_country ?? 'N/A' }}
                        </td>

                        <!-- Company (from vacancy) -->
                        <td>
                            {{ $job->vacancy?->custom_company_name ?? 'N/A' }}
                        </td>

                        <!-- Categories (from job) -->
                        <td>
                            @if ($job->vacancy && $job->vacancy->categories->isNotEmpty())
                            @foreach ($job->vacancy->categories as $cat)
                            <span class="badge bg-info">{{ $cat->name }}</span>
                            @endforeach
                            @else
                            <span class="text-muted">N/A</span>
                            @endif
                        </td>

                        <!-- Job Title -->
                        <td>{{ $job->title }}</td>

                        <!-- Openings -->
                        <td>
                            {{ $job->total_openings ?? (($job->male_opening ?? 0) + ($job->female_opening ?? 0)) }}
                        </td>

                        <!-- Action -->
                        <td>
                            <a href="{{ route('jobById', $job->id) }}" class="btn theme-btn btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Mobile friendly adjustments */
    @media (max-width: 768px) {

        #jobsTable th,
        #jobsTable td {
            font-size: 0.85rem;
            /* smaller text */
            padding: 0.4rem;
            /* tighter spacing */
        }

        #jobsTable .btn {
            font-size: 0.75rem;
            /* smaller button text */
            padding: 0.25rem 0.5rem;
        }

        #jobsTable .badge {
            font-size: 0.7rem;
            padding: 0.3em 0.4em;
        }
    }
</style>
@endpush