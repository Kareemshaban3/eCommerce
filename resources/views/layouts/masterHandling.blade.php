{{-- ✅ رسائل الخطأ فوق الفورم مباشرة --}}
@if ($errors->any())
    <div class="alert alert-danger text-center" style="font-size: 18px; font-weight: bold;">
        <ul class="mb-0" style="list-style: none; padding: 0;">
            @foreach ($errors->all() as $error)
                <li>⚠️ {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- ✅ رسالة النجاح فوق الفورم مباشرة --}}
@if (session('success'))
    <div id="success-message" class="alert alert-success text-center animated-message">
        ✅ {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('success-message').style.display = 'none';
        }, 6000);
    </script>
@endif



