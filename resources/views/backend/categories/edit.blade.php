<form action="{{ route('backend.update.category',[ 'id' => 1 ]) }}" method="post">
    @csrf
    <button type="submit">Cập nhật</button>
</form>