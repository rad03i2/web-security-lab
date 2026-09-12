function scorePassword(password) {
  let score = 0;
  if (password.length >= 12) score += 2;
  if (/[A-Z]/.test(password)) score += 1;
  if (/[a-z]/.test(password)) score += 1;
  if (/\d/.test(password)) score += 1;
  if (/[^A-Za-z0-9]/.test(password)) score += 1;
  return score;
}

function describe(score) {
  if (score >= 5) return 'strong';
  if (score >= 3) return 'medium';
  return 'weak';
}

module.exports = { scorePassword, describe };
