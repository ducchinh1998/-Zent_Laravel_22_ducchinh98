<form action="{{ route('backend.store.blog',[ 'id' => 1 ]) }}" method="POST">
    @csrf
    <button type="submit">Tạo mới Blog</button>
</form>