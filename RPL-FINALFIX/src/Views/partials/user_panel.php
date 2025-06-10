<div class="user-panel" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; margin-bottom: 20px;">
    
    <div>
        Selamat datang, <b><?= htmlspecialchars(auth_user()['name']) ?></b>
        <span style="background-color: #e2e3e5; color: #495057; padding: 2px 6px; border-radius: 4px; font-size: 12px; margin-left: 5px;">
            Role: <?= ucfirst(htmlspecialchars(auth_user()['role'])) ?>
        </span>
    </div>

    <nav style="display: flex; align-items: center; gap: 20px;">
        
        <?php if (isAdmin() || isSekben()): ?>
            <a href="/RPL-FINALFIX/public/keuangan">Keuangan</a>
        <?php endif; ?>

        <?php if (isAdmin() || isRumahTangga()): ?>
            <a href="/RPL-FINALFIX/public/inventaris">Inventaris</a>
            <a href="/RPL-FINALFIX/public/admin/peminjaman">Manajemen Peminjaman</a>
        <?php endif; ?>

        <?php if (isAdmin() || isSekben() || isRumahTangga()): ?>
            <a href="/RPL-FINALFIX/public/jadwal">Jadwal Kajian</a>
        <?php endif; ?>
        
        <form action="/RPL-FINALFIX/public/logout" method="POST" style="margin: 0;">
            <button type="submit" style="background: none; border: 1px solid #dc3545; color: #dc3545; padding: 5px 10px; cursor: pointer; border-radius: 4px;">Logout</button>
        </form>
    </nav>
</div>