@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <form class="form-horizontal" method="POST" action="{{ route('email-update') }}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $adminEmail }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">
                                    Изменить почту
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Заявки</div>

                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Имя</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                            @if(isset($messages))
                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td class="text-right"><a class="btn btn-default"
                                            href="{{ route('message-show', ['message' => $message->id]) }}">Подробнее</a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
