-- ===================== DATABASE MIGRATIONS =====================
-- Add created_by column to events table
-- Run this SQL in phpMyAdmin or MySQL client

ALTER TABLE events ADD COLUMN created_by INT DEFAULT NULL AFTER imgPath;
ALTER TABLE events ADD CONSTRAINT fk_events_user FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL;

ALTER TABLE achievements ADD COLUMN created_by INT DEFAULT NULL AFTER imgPath;
ALTER TABLE achievements ADD CONSTRAINT fk_achievements_user FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL;

-- Note: Articles table already has 'author' column which maps to user name
-- If you want to add user_id tracking, also add:
ALTER TABLE articles ADD COLUMN created_by INT DEFAULT NULL AFTER author;
ALTER TABLE articles ADD CONSTRAINT fk_articles_user FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL;
