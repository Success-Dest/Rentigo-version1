<?php require APPROOT . '/views/inc/manager_header.php'; ?>

<div class="tenants-content">
    <div class="page-header">
        <div class="header-left">
            <h1 class="page-title">Tenant Management</h1>
            <p class="page-subtitle">Manage tenant information and lease agreements</p>
        </div>
        <!-- <div class="header-right">
            <button class="btn btn-primary" onclick="openAddTenantModal()">
                <i class="fas fa-user-plus"></i>
                Add Tenant
            </button>
        </div> -->
    </div>

    <div class="dashboard-section">
        <div class="section-header">
            <div class="search-filters">
                <input type="text" class="search-input" placeholder="Search tenants..." id="tenantSearch">
            </div>
        </div>

        <!-- Tenant Status Tabs -->
        <div class="tabs-container">
            <div class="tabs-nav">
                <button class="tab-button active" onclick="showTab('active')">Active (2)</button>
                <button class="tab-button" onclick="showTab('pending')">Pending (1)</button>
                <button class="tab-button" onclick="showTab('vacated')">Vacated (0)</button>
            </div>

            <!-- Active Tenants Tab -->
            <div id="active-tab" class="tab-content active">
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Property</th>
                                <th>Lease Start</th>
                                <th>Lease End</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-medium">Sarah Johnson</td>
                                <td>
                                    <div>sarah.j@email.com</div>
                                    <div class="text-muted small">(555) 123-4567</div>
                                </td>
                                <td>Oak Street Apt 2A</td>
                                <td>2023-06-01</td>
                                <td>2024-05-31</td>
                                <td><span class="status-badge approved">Active</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-icon" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn-icon" title="Edit Tenant">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-medium">Mike Chen</td>
                                <td>
                                    <div>mike.chen@email.com</div>
                                    <div class="text-muted small">(555) 234-5678</div>
                                </td>
                                <td>Pine Avenue House</td>
                                <td>2023-09-01</td>
                                <td>2024-08-31</td>
                                <td><span class="status-badge approved">Active</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-icon" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn-icon" title="Edit Tenant">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pending Tenants Tab -->
            <div id="pending-tab" class="tab-content">
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Property</th>
                                <th>Lease Start</th>
                                <th>Lease End</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-medium">Emily Davis</td>
                                <td>
                                    <div>emily.davis@email.com</div>
                                    <div class="text-muted small">(555) 345-6789</div>
                                </td>
                                <td>Maple Drive Apt 1B</td>
                                <td>2023-03-15</td>
                                <td>2024-03-14</td>
                                <td><span class="status-badge pending">Pending</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-icon" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn-icon" title="Edit Tenant">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Vacated Tenants Tab -->
            <div id="vacated-tab" class="tab-content">
                <div class="empty-state">
                    <i class="fas fa-users" style="font-size: 3rem; color: var(--text-muted); margin-bottom: 1rem;"></i>
                    <p class="text-muted">No vacated tenants found</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Tenant Modal -->
<div id="addTenantModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Add New Tenant</h2>
            <p class="modal-description">Enter the tenant details. All fields marked with * are required.</p>
            <button class="modal-close" onclick="closeAddTenantModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="addTenantForm">
                <!-- Enhanced form with full name field and additional tenant information -->
                <div class="form-group">
                    <label for="tenantFullName">Full Name *</label>
                    <input type="text" id="tenantFullName" name="tenantFullName" placeholder="e.g., John Doe" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="tenantEmail">Email *</label>
                        <input type="email" id="tenantEmail" name="tenantEmail" placeholder="john@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="tenantPhone">Phone *</label>
                        <input type="tel" id="tenantPhone" name="tenantPhone" placeholder="(555) 123-4567" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tenantProperty">Assigned Property *</label>
                    <select id="tenantProperty" name="tenantProperty" required>
                        <option value="">Select property</option>
                        <option value="oak-street-2a">Oak Street Apt 2A</option>
                        <option value="pine-avenue">Pine Avenue House</option>
                        <option value="maple-drive-1b">Maple Drive Apt 1B</option>
                        <option value="cedar-lane">Cedar Lane House</option>
                        <option value="elm-street-3c">Elm Street Apt 3C</option>
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="leaseStart">Lease Start Date</label>
                        <input type="date" id="leaseStart" name="leaseStart">
                    </div>
                    <div class="form-group">
                        <label for="leaseEnd">Lease End Date</label>
                        <input type="date" id="leaseEnd" name="leaseEnd">
                    </div>
                </div>

                <!-- Added monthly rent and security deposit fields -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="tenantMonthlyRent">Monthly Rent</label>
                        <input type="text" id="tenantMonthlyRent" name="tenantMonthlyRent" placeholder="$1,200">
                    </div>
                    <div class="form-group">
                        <label for="securityDeposit">Security Deposit</label>
                        <input type="text" id="securityDeposit" name="securityDeposit" placeholder="$1,200">
                    </div>
                </div>

                <div class="form-group">
                    <label for="tenantStatus">Status</label>
                    <select id="tenantStatus" name="tenantStatus">
                        <option value="pending">Pending</option>
                        <option value="active">Active</option>
                        <option value="vacated">Vacated</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeAddTenantModal()">Cancel</button>
            <button type="submit" class="btn btn-primary" form="addTenantForm">Add Tenant</button>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/manager_footer.php'; ?>
