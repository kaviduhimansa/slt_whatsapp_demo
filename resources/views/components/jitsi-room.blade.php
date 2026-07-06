<div id="jitsi-container"
     style="height: {{ $height ?? 700 }}px;"
     class="rounded-2xl overflow-hidden border border-white/10">
</div>

<script src="https://meet.jit.si/external_api.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const domain = "meet.jit.si";

        const options = {
            roomName: "{{ $room }}",
            width: "100%",
            height: {{ $height ?? 700 }},
            parentNode: document.querySelector('#jitsi-container'),
            userInfo: {
                displayName: "{{ auth()->user()->name }}"
            }
        };

        new JitsiMeetExternalAPI(domain, options);
    });
</script>