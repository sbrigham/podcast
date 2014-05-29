@extends('admin.layouts.master')

@section('content')
    <h1> Blog Posts </h1>
    <table class="table table-hover">
        <thead>
          <tr>
              <th>
                  Title
              </th>
              <th>
                  Content
              </th>
              <th>
                  Published At
              </th>
              <th>

              </th>
              <th>

              </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($blog_posts as $blog_post)
            <tr>
                <td> {{ HTML::linkRoute('blog.path', $blog_post['title'], ['path' => $blog_post['path']]) }} </td>
                <td> {{ $blog_post['content'] }} </td>
                <td> {{ $blog_post['published_at'] }} </td>
                <td> {{ HTML::linkRoute('admin.blog.edit', 'Edit', ['id' => $blog_post['id']], ['class' => 'btn btn-primary']) }} </td>
                <td>
                    {{ Form::open(array('route' => ['admin.blog.destroy', $blog_post['id']])) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop