
@section('sample-tabs')
    <h1>Simple Tabs</h1>
    <ul id="tabs">
        <li><a href="#java">Java</a></li>
        <li><a href="#php">PHP</a></li>
        <li><a href="#python">Python</a></li>
        <li><a href="#ruby">Ruby</a></li>
        <li><a href="#perl">Perl</a></li>
    </ul>

    <div class="tab-content">
        <div id="java" class="tab-section">
            <h2>Here we place title - Java</h2>
            <p>Here we place details </p>
        </div>
        <div id="php" class="tab-section">
            <h2>Here we place title - PHP</h2>
            <p>Here we place details </p>
        </div>
        <div id="python" class="tab-section">
            <h2>Here we place title - Python</h2>
            <p>Here we place details </p>
        </div>
        <div id="ruby" class="tab-section">
            <h2>Here we place title</h2>
            <p>Here we place details </p>
        </div>
        <div id="perl" class="tab-section">
            <h2>Here we place title</h2>
            <p>Here we place details </p>
        </div>
    </div>
@stop


@section('add-js')
    @parent
    <script>
        $(function(){
            $('.tab-section').hide();
            $('#tabs a').bind('click', function(e){
                $('#tabs a.current').removeClass('current');
                $('.tab-section:visible').hide();
                $(this.hash).show();
                $(this).addClass('current');
                e.preventDefault();
            }).filter(':first').click();
        });
    </script>
@stop