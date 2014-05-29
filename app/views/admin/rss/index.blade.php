@extends('admin.layouts.master')

@section('content')
    <h1> Category </h1>
    <table class="table table-hover">
        <thead>
          <tr>
              <th>
                  Name
              </th>

              <th>
                  Path
              </th>

              <th>

              </th>
              <th>

              </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td> {{ $category['name'] }} </td>
                <td> {{ $category['path'] }} </td>
                <td> {{ HTML::linkRoute('admin.category.edit', 'Edit', ['id' => $category['id']], ['class' => 'btn btn-primary']) }} </td>
                <td>
                    {{ Form::open(array('route' => ['admin.category.destroy', $category['id']])) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ HTML::linkRoute('admin.category.create', 'Create New Category', ['id' => $category['id']], ['class' => 'btn btn-success']) }}
@stop