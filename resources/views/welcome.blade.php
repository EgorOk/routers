@extends('layout')

@section('title')
    myRoyter
@endsection

@section('main_content')
    <form name="articks">
        @csrf
        <div class="mb-3">
            <label for="text" class="form-label">Ссылка</label>
            <input type="text" class="form-control" id="router" placeholder="Ваша ссылка" name="router">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Желаемый адрес</label>
            <input type="text" class="form-control" id="router_my" placeholder="http://myrouters/" name="router_my">
        </div>
        <button type="button" onclick="addArticle()" class="btn btn-primary">Готово</button>
    </form>

    <script>
        function addArticle() {
            const router = document.querySelector('input[name="router"]').value;
            const router_my = document.querySelector('input[name="router_my"]').value;

            var form_data = new FormData();
            form_data.append('router', router);
            form_data.append('router_my', router_my);

            fetch('/api/router', {
                    method: "post",
                    body: form_data,
                    headers: {
                        'X-CSRF-TOKEN': "{!! csrf_token() !!}"
                    }
                })
                .then(function(response) {
                    if (response.status == 201) {
                        return Promise.reject(new Error(response.statusText))
                    }
                    return Promise.resolve(response)
                })
                .then(function(response) {
                    return response.json()
                })
                .catch(function(error) {
                    console.log('error', error)
                })
        }
    </script>
@endsection
