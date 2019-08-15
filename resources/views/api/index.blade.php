@extends('layouts.master')


@section('content')



    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>
                    Guide
                </h2>
                <hr>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col">
                        <div class="row">

                            <code>
                                <pre>

                                    POST /api/data?page=1 HTTP/1.1
                                    Host: accuair.cf
                                    Content-Type: application/json
                                    Accept: */*


                                    {
                                        "key": "YOUR_API_KEY",
                                        "lat":"6",
                                        "lng":"79",
                                        "from":"2019-08-15 16:56:08"
                                    }
                                </pre>
                            </code>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="card">
            <div class="card-header">
                <h2>
                    Python 3 Example
                </h2>
                <hr>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col">
                        <div class="row">

                            <code>
                                <pre>
                                    >>> import requests
                                    >>> import json
                                    >>> url = "http://accuair.cf/api/data"
                                    >>> headers = {'Content-type': 'application/json', 'Accept': 'application/json'}
                                    >>> data = { "key": "YOUR_API_KEY", "lat":"6", "lng":"79", "from":"2019-08-15 16:56:08" }
                                    >>> r = requests.post(url, data=json.dumps(data), headers=headers)
                                    >>> r.status_code
                                    >>> r.json()
                                    >>> r.text
                                </pre>
                            </code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="row">
            <form action="{{ route('key.store') }}" method="POST">
                @csrf

                <input type="submit" class="btn btn-primary btn-lg" value="Generate Key">
            </form>
        </div>
    </div>


<div class="row">
    <div class="col-md-12">
        @foreach($keys as $key)
            <hr>
        <div class="card shadow">
            <div class="card-body">
                <div class="row ">

                    <div class="col-md-7">
                        {{ $key->key }}
                    </div>
                    <div class="col-md-3">
                        Remaining: {{ ($key->limit - $key->used) }} / {{ $key->limit }}
                    </div>
                    <div class="col-md-2">
                        <form  action="{{ route('key.destroy', $key->id) }}" method="POST" >
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm">X</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
            <hr>
    </div>
</div>

@endsection

