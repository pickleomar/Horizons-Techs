document.addEventListener('DOMContentLoaded', () => {
    const issuesGrid = document.getElementById('issues-grid');
    const loadMoreButton = document.getElementById('load-more');
    const currentIssueId = "{{ $currentIssue->id }}"; // Get the current issue ID from Blade

    let offset = 3; // Start with the first 3 issues already loaded
    const limit = 3; // Load 3 issues per request

    // Function to load more issues
    async function loadMoreIssues() {
        try {
            const response = await fetch(`/magazines/${currentIssueId}/load-more?offset=${offset}&limit=${limit}`);
            if (!response.ok) throw new Error('Failed to fetch issues');
            const issues = await response.json();

            // Append the new issues to the grid
            issues.forEach(issue => {
                const issueCard = document.createElement('div');
                issueCard.classList.add('issue-card');

                if (issue.image) {
                    issueCard.innerHTML = `
                        <img src="${issue.image}" alt="${issue.title}" class="issue-image">
                    `;
                } else {
                    const publicationYear = new Date(issue.publication_date).getFullYear();
                    issueCard.innerHTML = `
                        <div class="placeholder-year">${publicationYear}</div>
                    `;
                }

                issuesGrid.appendChild(issueCard);
            });

            // Update the offset
            offset += issues.length;

            // Hide the button if no more issues are available
            if (issues.length < limit) {
                loadMoreButton.style.display = 'none';
            }
        } catch (error) {
            console.error('Error loading more issues:', error);
        }
    }

    // Attach event listener to Load More button
    if (loadMoreButton) {
        loadMoreButton.addEventListener('click', loadMoreIssues);
    }
});
