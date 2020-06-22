package Model;

public class AssetDto {
    private String name;
    private String desc;
    private int value;

    public AssetDto(String name, String desc, int value) {
        this.name = name;
        this.desc = desc;
        this.value = value;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getDesc() {
        return desc;
    }

    public void setDesc(String desc) {
        this.desc = desc;
    }

    public int getValue() {
        return value;
    }

    public void setValue(int value) {
        this.value = value;
    }

    @Override
    public String toString() {
        return "AssetDto{" +
                "name='" + name + '\'' +
                ", desc='" + desc + '\'' +
                ", value=" + value +
                '}';
    }
}
