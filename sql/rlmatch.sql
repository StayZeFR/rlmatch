CREATE TABLE IF NOT EXISTS player (
    id SERIAL PRIMARY KEY,
    uuid VARCHAR(32) NOT NULL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) DEFAULT NULL,
    token INT DEFAULT 0,
    win INT DEFAULT 0,
    lose INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (uuid)
);

CREATE TABLE IF NOT EXISTS friend (
    player_id INT,
    friend_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (player_id, friend_id),
    FOREIGN KEY (player_id) REFERENCES player(id),
    FOREIGN KEY (friend_id) REFERENCES player(id)
);

CREATE TABLE IF NOT EXISTS team (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    created_by int,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES player(id)
);

CREATE TABLE IF NOT EXISTS team_member (
    team_id INT,
    player_id int,
    PRIMARY KEY (team_id, player_id),
    FOREIGN KEY (team_id) REFERENCES team(id),
    FOREIGN KEY (player_id) REFERENCES player(id)
);

CREATE TABLE IF NOT EXISTS bo (
    id SERIAL PRIMARY KEY,
    type INT NOT NULL,
    start_at TIMESTAMP,
    token INT,
    nb_bo INT,
    team1_id INT,
    team2_id INT,
    winner INT,
    created_by int,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES player(id),
    FOREIGN KEY (team1_id) REFERENCES team(id),
    FOREIGN KEY (team2_id) REFERENCES team(id),
    FOREIGN KEY (winner) REFERENCES team(id)
);

CREATE TABLE IF NOT EXISTS match (
    id SERIAL PRIMARY KEY,
    bo_id INT,
    winner INT,
    score_team1 INT,
    score_team2 INT,
    UNIQUE (bo_id),
    FOREIGN KEY (bo_id) REFERENCES bo(id),
    FOREIGN KEY (winner) REFERENCES team(id)
);

CREATE TABLE IF NOT EXISTS notification (
    id SERIAL PRIMARY KEY,
    send_by int,
    receive_by int,
    message TEXT,
    send_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    response_at TIMESTAMP,
    response INT,
    expired_at TIMESTAMP,
    FOREIGN KEY (send_by) REFERENCES player(id),
    FOREIGN KEY (receive_by) REFERENCES player(id)
);

CREATE TABLE IF NOT EXISTS notification_friend (
    notification_id INT,
    FOREIGN KEY (notification_id) REFERENCES notification(id)
);

CREATE TABLE IF NOT EXISTS notification_match (
    notification_id INT,
    bo_id INT,
    FOREIGN KEY (notification_id) REFERENCES notification(id),
    FOREIGN KEY (bo_id) REFERENCES bo(id)
);

CREATE FUNCTION getUsername(player INT)
    RETURNS VARCHAR(50) AS
    $body$
DECLARE username VARCHAR(50);
BEGIN
    SELECT p.username INTO username
    FROM player p WHERE p.id = player;

    RETURN username;
END
$body$
LANGUAGE plpgsql;