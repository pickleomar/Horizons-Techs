<x-app-layout>
    <div class="magazine">
        <div class="magazine-topper">
            <h1 class="magazine-head">Magazine</h1>
            <ul class="menu-bar">
                <li>
                    <a href="#past-issues" class="menu-item">View past issues</a>                
                </li>
            </ul>
        </div>
        <div class="issue-container">
                <div class="issue">
                    <div class="issue-image">
                        @if ($currentIssue->image)
                            <img src="{{ asset( $currentIssue->image) }}" alt="{{ $currentIssue->title }}" />
                        @else
                            <img src="{{ asset('default-image.jpg') }}" alt="Default Image" />
                        @endif
                    </div>
                    <div class="issue-details">
                        <h2 class="issue-title">{{ $currentIssue->title }}</h2>
                        <p class="issue-date">{{ $currentIssue->publication_date->format('F Y') }}</p>
                        <p class="issue-description">{{ Str::limit($currentIssue->description, 200) }}</p>
                        <div class="issue-links">
                            <a href="{{ route('magazines.show', $currentIssue->id) }}" class="read-issue">Read this issue</a>
                            <a href="{{ route('magazines.download', $currentIssue->id) }}" class="download-issue">Download PDF</a>
                        </div>

                        <nav id="navigate-issues" aria-label="Issue navigation">
                        <ul class="navList">
                            <!-- Previous Issue -->
                            <li class="previous-issue">
                                @if ($previousIssue)
                                    <a href="{{ route('magazines.show', $previousIssue->id) }}" class="navLink">
                                        <span class="nav_icon" aria-hidden="true">
                                        <svg>
                                        <path stroke="#fff" stroke-width="3" d="M10 3L3 12L10 21"></path>
                                        </svg>
                                        </span>
                                        View previous issue
                                    </a>
                                @else
                                    <span class="navLink disabled">No previous issue</span>
                                @endif
                            </li>
                            <!-- Next Issue -->
                            <li class="next-issue">
                                @if ($nextIssue)
                                    <a href="{{ route('magazines.show', $nextIssue->id) }}" class="navLink">
                                        View next issue
                                        <span class="nav_icon" aria-hidden="true">
                                            <svg >
                                                <path stroke="#fff" stroke-width="3" d="M3 3L9 12L3 21"></path>
                                            </svg>
                                        </span>
                                    </a>
                                @else
                                    <span class="navLink disabled">No next issue</span>
                                @endif
                            </li>
                        </ul>
                        </nav>
                    </div>
                </div>
        </div>

        <div id="past-issues" class="past-issues-container">
        <h1 class="title">Past Issues</h1>
        <div class="issues-grid" id="issues-grid">
            @foreach ($pastIssues->take(3) as $issue) <!-- Load only the first 3 issues -->
                <div class="issue-card">
                    @if ($issue->image)
                        <img src="{{ asset($issue->image) }}" alt="{{ $issue->title }}" class="issue-image">
                    @else
                        <div class="placeholder-year">{{ $issue->publication_date->format('Y') }}</div>
                    @endif
                </div>
            @endforeach
        </div>
        @if ($pastIssues->count() > 3)
            <!-- Load More Button -->
            <div class="load-more-container">
                <button id="load-more" class="load-more-button">Load More</button>
            </div>
        @endif
        </div>
</div>
<script>

</script>

</x-app-layout>
