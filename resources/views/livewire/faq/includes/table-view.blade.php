<div>
    <div class="mt-5">
        {{ $faqs->links() }}
    </div>

    <table class="table table-hover mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Question</th>
            <th scope="col">Answer</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($faqs as $faq)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $faq->question }}</td>
                <td>{{ $faq->answer }}</td>
                <td>
                    <a wire:click.prevent="edit({{ $faq->id }})" type="button" class="btn btn-primary" style="margin: 5px;">Edit</a>
                    <a wire:click.prevent="" type="button" class="btn btn-danger" style="margin: 5px;">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
