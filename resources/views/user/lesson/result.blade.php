@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel panel-heading">
                    <h3>{{ session('categoryName') }} Result
                        {{ $totalCorrect }}/{{ session('totalQuestions') }}
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-lg-10">
                        <table class="col-lg-12">
                            <thead>
                                <tr>
                                    <th class="col-lg-4">
                                        <h4>Is Correct</h4>
                                    </th>
                                    <th class="col-lg-4">
                                        <h4>Question</h4>
                                    </th>
                                    <th class="col-lg-4">
                                        <h4>Answer<h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($resultOptions as $resultOption)
                                <tr>
                                    <td>
                                        <h4>{{ $resultOption['isCorrect'] }}</h4>
                                    </td>
                                    <td>
                                        <h4>{{ $resultOption['wordContent'] }}</h4>
                                    </td>
                                    <td>
                                        <h4>{{ $resultOption['wordAnswerContent'] }}</h4>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
