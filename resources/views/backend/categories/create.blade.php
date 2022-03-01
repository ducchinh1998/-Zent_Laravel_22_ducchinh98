<form action="{{ route('backend.store.category',[ 'id' => 1 ]) }}" method="POST">
    @csrf
    <button type="submit">Tạo mới</button>
</form>