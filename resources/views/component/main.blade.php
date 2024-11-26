<div class="col-md-8 col-lg-9 main-content" id="main">
    <!-- Top Section -->
    <div class="top-section">
        <h1>Welcome to your Dashboard!</h1>
    </div>

    <!-- Table Section -->
    <div class="table-container">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0 text-center">URL Management</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Big URL</th>
                            <th scope="col">Small URL</th>
                            <th scope="col">Click Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paginatedUrls as $url)
                        <tr>
                            <td>{{ $url->id }}</td>
                            <td><a href="{{ $url->big_url }}" target="_blank">{{ $url->big_url }}</a></td>
                            <td><a href="{{ url($url->small_url) }}" target="_blank">{{ url($url->small_url) }}</a></td>
                            <td>{{ $url->count_click }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    @if($currentPage > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ url()->current() . '?page=' . ($currentPage - 1) }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif

                    @for($i = 1; $i <= $totalPages; $i++)
                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                            <a class="page-link" href="{{ url()->current() . '?page=' . $i }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if($currentPage < $totalPages)
                        <li class="page-item">
                            <a class="page-link" href="{{ url()->current() . '?page=' . ($currentPage + 1) }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
