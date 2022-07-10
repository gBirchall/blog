@if (session()->has('success'))
    <div x-data="{show:true}" x-init="setTimeout(() => show = false, 4000)" x-show="show">

        <p class="fixed bottom-3 right-3 bg-blue-500 text-white rounded-xl p-2">{{ session('success') }} </p>
    </div>
@endif
</body>
