<?php $cc_seen = isset($_COOKIE['cc_necessary']); ?>
<?php if(!$cc_seen): ?>
<!-- GDPR Cookie Consent Banner -->
<div id="cc-banner" role="dialog" aria-modal="true" aria-label="Cookie consent" style="display:none;position:fixed;bottom:0;left:0;right:0;z-index:99999;background:#1e2030;color:#e8eaf0;padding:18px 24px;box-shadow:0 -3px 16px rgba(0,0,0,0.35);">
    <div style="max-width:1200px;margin:0 auto;display:flex;flex-wrap:wrap;gap:14px;align-items:center;justify-content:space-between;">
        <div style="flex:1;min-width:220px;font-size:0.9rem;line-height:1.5;">
            <?php echo echoOutput($translation['tr_201']); ?>
            <a href="<?php echo $urlPath->privacy(); ?>" style="color:#7eb8f7;text-decoration:underline;white-space:nowrap;"><?php echo echoOutput($translation['tr_202']); ?></a>
        </div>
        <div style="display:flex;gap:8px;flex-wrap:wrap;flex-shrink:0;">
            <button onclick="ccSetConsent(false)" style="background:transparent;color:#aab0c6;border:1px solid #aab0c6;border-radius:6px;padding:8px 16px;font-size:0.85rem;cursor:pointer;white-space:nowrap;">Reject All</button>
            <button onclick="ccOpenModal()" style="background:transparent;color:#e8eaf0;border:1px solid #e8eaf0;border-radius:6px;padding:8px 16px;font-size:0.85rem;cursor:pointer;white-space:nowrap;">Manage Preferences</button>
            <button onclick="ccSetConsent(true)" style="background:#4c78d9;color:#fff;border:none;border-radius:6px;padding:8px 20px;font-size:0.85rem;font-weight:600;cursor:pointer;white-space:nowrap;">Accept All</button>
        </div>
    </div>
</div>

<!-- Preferences Modal -->
<div id="cc-modal" role="dialog" aria-modal="true" aria-labelledby="cc-modal-title" style="display:none;position:fixed;inset:0;z-index:100000;background:rgba(0,0,0,0.55);align-items:center;justify-content:center;padding:16px;">
    <div style="background:#fff;color:#222;border-radius:10px;max-width:480px;width:100%;box-shadow:0 8px 32px rgba(0,0,0,0.25);overflow:hidden;">
        <div style="background:#1e2030;color:#e8eaf0;padding:18px 24px;display:flex;align-items:center;justify-content:space-between;">
            <h2 id="cc-modal-title" style="margin:0;font-size:1.1rem;font-weight:600;">Cookie Preferences</h2>
            <button onclick="ccCloseModal()" aria-label="Close" style="background:none;border:none;color:#aab0c6;font-size:1.4rem;cursor:pointer;line-height:1;">&#x2715;</button>
        </div>
        <div style="padding:24px;">
            <p style="margin:0 0 20px;font-size:0.9rem;color:#555;line-height:1.55;">
                We use cookies to operate the site and improve your experience. You can choose which categories to allow below.
                <a href="<?php echo $urlPath->privacy(); ?>" style="color:#4c78d9;"><?php echo echoOutput($translation['tr_202']); ?></a>.
            </p>

            <!-- Necessary -->
            <div style="border:1px solid #e5e7eb;border-radius:8px;padding:16px;margin-bottom:12px;">
                <div style="display:flex;align-items:center;justify-content:space-between;">
                    <div>
                        <strong style="font-size:0.9rem;">Necessary</strong>
                        <p style="margin:4px 0 0;font-size:0.8rem;color:#666;">Required for the site to function. Cannot be disabled.</p>
                    </div>
                    <span style="background:#4c78d9;color:#fff;border-radius:20px;padding:3px 10px;font-size:0.75rem;font-weight:600;">Always on</span>
                </div>
            </div>

            <!-- Analytics -->
            <div style="border:1px solid #e5e7eb;border-radius:8px;padding:16px;">
                <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;">
                    <div>
                        <strong style="font-size:0.9rem;">Analytics</strong>
                        <p style="margin:4px 0 0;font-size:0.8rem;color:#666;">Helps us understand how visitors use our site. All data is anonymous.</p>
                    </div>
                    <label style="position:relative;display:inline-block;width:44px;height:24px;flex-shrink:0;">
                        <input type="checkbox" id="cc-toggle-analytics" style="opacity:0;width:0;height:0;">
                        <span id="cc-slider" style="position:absolute;cursor:pointer;inset:0;background:#ccc;border-radius:24px;transition:.25s;"></span>
                    </label>
                </div>
            </div>
        </div>
        <div style="padding:16px 24px;border-top:1px solid #e5e7eb;display:flex;justify-content:flex-end;gap:8px;">
            <button onclick="ccCloseModal()" style="background:transparent;color:#555;border:1px solid #ccc;border-radius:6px;padding:8px 18px;font-size:0.85rem;cursor:pointer;">Cancel</button>
            <button onclick="ccSavePreferences()" style="background:#4c78d9;color:#fff;border:none;border-radius:6px;padding:8px 20px;font-size:0.85rem;font-weight:600;cursor:pointer;">Save Preferences</button>
        </div>
    </div>
</div>

<style>
#cc-toggle-analytics:checked + #cc-slider { background: #4c78d9; }
#cc-toggle-analytics:checked + #cc-slider::before { transform: translateX(20px); }
#cc-slider::before {
    content: '';
    position: absolute;
    width: 18px; height: 18px;
    left: 3px; bottom: 3px;
    background: #fff;
    border-radius: 50%;
    transition: .25s;
}
@media (max-width: 640px) {
    #cc-banner > div { flex-direction: column; align-items: flex-start; }
    #cc-banner > div > div:last-child { width: 100%; }
    #cc-banner > div > div:last-child button { flex: 1; text-align: center; }
}
</style>

<script>
function _ccSetCookie(name, value, days) {
    var d = new Date();
    d.setTime(d.getTime() + days * 864e5);
    document.cookie = name + '=' + value + ';expires=' + d.toUTCString() + ';path=/;SameSite=Lax';
}
function _ccLoadAnalytics() {
    if (!window.__analyticsCode || window.__analyticsLoaded) return;
    window.__analyticsLoaded = true;
    var tmp = document.createElement('div');
    tmp.innerHTML = window.__analyticsCode;
    tmp.querySelectorAll('script').forEach(function(orig) {
        var s = document.createElement('script');
        if (orig.src) { s.src = orig.src; s.async = !!orig.async; }
        else { s.textContent = orig.textContent; }
        document.head.appendChild(s);
    });
}
function ccSetConsent(analytics) {
    _ccSetCookie('cc_necessary', '1', 365);
    _ccSetCookie('cc_analytics', analytics ? '1' : '0', 365);
    document.getElementById('cc-banner').style.display = 'none';
    if (analytics) _ccLoadAnalytics();
}
function ccOpenModal() {
    document.getElementById('cc-modal').style.display = 'flex';
}
function ccCloseModal() {
    document.getElementById('cc-modal').style.display = 'none';
}
function ccSavePreferences() {
    var analytics = document.getElementById('cc-toggle-analytics').checked;
    ccSetConsent(analytics);
    ccCloseModal();
}
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('cc-banner').style.display = 'block';
});
</script>
<?php endif; ?>
