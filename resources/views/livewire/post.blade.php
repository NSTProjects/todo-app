<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Posts Overview</h5>
            <button class="btn btn-light btn-sm" wire:click="togglePostForm">
                {{ $showForm ? 'Back to List' : 'Create Post' }}
            </button>
        </div>

        <div class="card-body">
            @if(!$showForm)
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td class="text-center">actions</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">No posts available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>
            @else
            <form wire:submit.prevent="store">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" wire:model.blur="title" class="form-control">
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea wire:model.blur="content" class="form-control" cols="30" rows="5"></textarea>
                    @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-danger ms-2" wire:click="togglePostForm">Close</button>
            </form>
            @endif
        </div>
    </div>
</div>