<form action="{{ route('backend.update.blog',[ 'id' => 1 ]) }}" method="POST">
    @csrf
    <button type="submit">Chỉnh sửa Blog</button>
</form>