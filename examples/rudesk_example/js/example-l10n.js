// SPDX-License-Identifier: AGPL-3.0-or-later
// Учебный пример, а не полный словарь Tables.
if (globalThis.OC && OC.L10N && typeof OC.L10N.register === 'function') {
    OC.L10N.register('tables', { Total: 'Всего' });
    document.documentElement.dataset.ruDeskExample = '0.1.0';
}
