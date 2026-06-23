<x-app-layout>
  <div class="max-w-7xl mx-auto p-3 sm:p-4">
    <div class="rounded-2xl bg-white/5 border border-white/10 overflow-hidden">
      <div class="gradient-header p-6 text-white">
        <h1 class="font-bold text-2xl">Video Calls</h1>
        <p class="text-white/80 mt-1">Manage and review your video call history</p>
      </div>

      <div class="p-6">
        <!-- Action Buttons -->
        <div class="mb-8 flex flex-col sm:flex-row gap-3">
          <a href="{{ route('chats.index') }}" class="px-6 py-3 rounded-xl bg-slt-primary text-white hover:opacity-90 text-sm font-medium transition-all flex items-center gap-2 justify-center">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            Back to Chats
          </a>
          <a href="/meeting" class="px-6 py-3 rounded-xl bg-emerald-600 text-white hover:bg-emerald-700 text-sm font-medium transition-all flex items-center gap-2 justify-center">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
            Test Meeting Room
          </a>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
          <div class="rounded-xl bg-white/5 border border-white/10 p-4">
            <div class="text-3xl font-bold text-slt-accent">{{ $activeCalls->count() }}</div>
            <div class="text-sm text-slt-muted mt-1">Active Calls</div>
          </div>
          <div class="rounded-xl bg-white/5 border border-white/10 p-4">
            <div class="text-3xl font-bold text-blue-400">{{ $endedCalls->count() }}</div>
            <div class="text-sm text-slt-muted mt-1">Ended Calls</div>
          </div>
          <div class="rounded-xl bg-white/5 border border-white/10 p-4">
            <div class="text-3xl font-bold text-white">{{ $totalCalls->count() }}</div>
            <div class="text-sm text-slt-muted mt-1">Total Calls</div>
          </div>
        </div>

        <!-- Active Calls -->
        <div class="mb-8">
          <h2 class="text-lg font-semibold text-white mb-4">Active Calls</h2>
          @if($activeCalls->count() > 0)
            <div class="space-y-3">
              @foreach($activeCalls as $meeting)
                <div class="rounded-xl bg-white/5 border border-white/10 p-4 flex items-center justify-between hover:bg-white/10 transition-all">
                  <div>
                    <div class="font-semibold text-white">{{ $meeting->contact->name ?? $meeting->contact->mobile }}</div>
                    <div class="text-sm text-slt-muted">
                      Started {{ $meeting->started_at->diffForHumans() }}
                      <span class="ml-3">Room: {{ substr($meeting->room_name, 0, 15) }}...</span>
                    </div>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    <form action="{{ route('video.end', $meeting->room_name) }}" method="POST" class="inline">
                      @csrf
                      <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-600 hover:bg-red-700 text-white text-sm transition-all">
                        End Call
                      </button>
                    </form>
                  </div>
                </div>
              @endforeach
            </div>
          @else
            <div class="rounded-xl bg-white/5 border border-white/10 p-8 text-center">
              <p class="text-slt-muted">No active calls at the moment</p>
            </div>
          @endif
        </div>

        <!-- Recent Calls -->
        <div>
          <h2 class="text-lg font-semibold text-white mb-4">Call History</h2>
          @if($endedCalls->count() > 0)
            <div class="space-y-3 max-h-96 overflow-y-auto">
              @foreach($endedCalls->sortByDesc('ended_at') as $meeting)
                <div class="rounded-xl bg-white/5 border border-white/10 p-4">
                  <div class="flex items-center justify-between">
                    <div>
                      <div class="font-semibold text-white">{{ $meeting->contact->name ?? $meeting->contact->mobile }}</div>
                      <div class="text-sm text-slt-muted">
                        {{ $meeting->started_at->format('M d, Y H:i') }} - {{ $meeting->ended_at->format('H:i') }}
                        <span class="ml-3">{{ $meeting->ended_at->diffInSeconds($meeting->started_at) }}s duration</span>
                      </div>
                    </div>
                    <span class="px-2 py-1 rounded-lg bg-white/10 text-xs text-slt-muted">{{ $meeting->status }}</span>
                  </div>
                </div>
              @endforeach
            </div>
          @else
            <div class="rounded-xl bg-white/5 border border-white/10 p-8 text-center">
              <p class="text-slt-muted">No call history yet</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
