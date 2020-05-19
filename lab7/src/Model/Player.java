package Model;

public class Player {

    private int[][] board;
    private int hits;

    public Player(int[][] initBoard) {
        this.board = initBoard;
        this.hits = 5;
    }

    public boolean youLost() {
        return hits == 0;
    }

    public int[][] getBoard(){return this.board;}


    public boolean hit(int i, int j) {

        if (board[i][j] == 0)
        {
            board[i][j] = 3;
            return false;
        }
        else if (board[i][j] == 1)
        {
            board[i][j] = 2;
            hits--;
            return true;
        }
        else
        {
            return false;
        }
    }
}
