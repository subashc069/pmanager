<div class="card my-2 " style="">
    <div class="card-header bg-primary text-white">Comments</div>
    @foreach ($comments as $comment)
        <div class="card-body">
            <h5 class="card-title">{{ $comment->body }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $comment->user->name}}</h6>
            <p class="card-text">{{ $comment->url }}</p>
            <a class="btn btn-primary float-left" href="/projects/{{ $project->id }}">View Project</a>
        </div>
    @endforeach
</div>