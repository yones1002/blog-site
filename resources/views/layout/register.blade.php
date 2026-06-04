<form id="newsletterForm">
    @csrf
    <input type="email" name="email" class="newsletter-input" placeholder="ایمیل" required>
    <button type="submit" class="btn-primary">ثبت‌نام</button>
</form>
<div id="toast" class="toast hidden"></div>

<script>
    const toast = document.getElementById('toast');

    function showToast(message, type = 'success') {
        toast.className = `toast ${type}`;
        toast.innerText = message;

        setTimeout(() => {
            toast.classList.remove('hidden');
        }, 50);

        setTimeout(() => {
            toast.classList.add('hidden');
        }, 2500);
    }

    document.getElementById('newsletterForm').addEventListener('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch("{{ url('/auth/newsletter/register') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
            },
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    showToast(data.message, 'success');
                    this.reset();
                } else {
                    showToast(data.message, 'error');
                }
            })
            .catch(() => {
                showToast('شما قبلا ثبت نام شده اید.', 'error');
            });
    });
</script>
