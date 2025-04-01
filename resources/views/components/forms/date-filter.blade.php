<div class="flex justify-end pr-5">
    <form action="{{ route('dashboard.index') }}" method="get" class="flex gap-5 items-end">
        @csrf
        <div class="flex flex-col">
            <label for="date_from" class="text-gray-500 font-medium">From</label>
            <input type="date" name="date_from" id="date_from" class="rounded-md" min="2025-01-01"
                value="{{ \Carbon\Carbon::today()->subDays(7)->format('Y-m-d') }}">
        </div>
        <div class="flex flex-col">
            <label for="date_to" class="text-gray-500 font-medium">To</label>
            <input type="date" name="date_to" id="date_to" class="rounded-md" min="2025-01-01"
                value="{{ date('Y-m-d') }}">
        </div>

        <div class="flex justify-end gap-2">
            <button type="submit" class="px-8 py-1 !bg-blue-600 text-white rounded-md" title="Filter">Filter</button>
        </div>
    </form>
</div>

